<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News');
        $this->load->model('NewsCategory');
        $this->load->helper(['url', 'text']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $filter_category = $this->input->get('filter_category');
        $filter_status   = $this->input->get('filter_status');
        $filter_keyword  = $this->input->get('filter_keyword');
        $data['user'] = $this->session->userdata();

        $data['title'] = 'Data News';
        $data['categories'] = $this->NewsCategory->get_all();
        $data['news'] = $this->News->get_filtered($filter_category, $filter_status, $filter_keyword);


        $this->load->view('admin/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('admin/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah News';
        $data['categories'] = $this->NewsCategory->get_all();
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('news/create', $data);
        $this->load->view('admin/footer', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('category_id', 'Kategori', 'required');
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[news.slug]');
        $this->form_validation->set_rules('content', 'Konten', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah News';
            $data['categories'] = $this->NewsCategy->get_all();
            $this->load->view('news/create', $data);
            return;
        }

        $data = [
            'category_id'       => $this->input->post('category_id', true),
            'title'             => $this->input->post('title', true),
            'slug'              => $this->input->post('slug', true),
            'thumbnail'         => $this->input->post('thumbnail', true),
            'short_description' => $this->input->post('short_description', true),
            'content'           => $this->input->post('content', false),
            'author'            => $this->input->post('author', true),
            'published_at'      => $this->input->post('published_at', true),
            'status'            => $this->input->post('status', true),
        ];

        $this->News->insert($data);
        $this->session->set_flashdata('success', 'News berhasil ditambahkan.');
        redirect('news');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail News';
        $data['news'] = $this->News->get_by_id($id);
        $data['categories'] = $this->NewsCategory->get_all();
        $data['user'] = $this->session->userdata();

        if (!$data['news']) {
            show_404();
        }

        $this->load->view('admin/header', $data);
        $this->load->view('news/detail', $data);
        $this->load->view('admin/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit News';
        $data['news'] = $this->News->get_by_id($id);
        $data['categories'] = $this->NewsCategory->get_all();
        $data['user'] = $this->session->userdata();

        if (!$data['news']) {
            show_404();
        }
        

        $this->load->view('admin/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('admin/footer');
    }

    public function update($id)
    {
        $news = $this->News->get_by_id($id);

        if (!$news) {
            show_404();
        }

        $slug_rule = 'required';
        if ($this->input->post('slug') != $news->slug) {
            $slug_rule .= '|is_unique[news.slug]';
        }

        $this->form_validation->set_rules('category_id', 'Kategori', 'required');
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('slug', 'Slug', $slug_rule);
        $this->form_validation->set_rules('content', 'Konten', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit News';
            $data['news'] = $news;
            $data['categories'] = $this->NewsCategory->get_all();
            $this->load->view('news/edit', $data);
            return;
        }

        $data = [
            'category_id'       => $this->input->post('category_id', true),
            'title'             => $this->input->post('title', true),
            'slug'              => $this->input->post('slug', true),
            'thumbnail'         => $this->input->post('thumbnail', true),
            'short_description' => $this->input->post('short_description', true),
            'content'           => $this->input->post('content', false),
            'author'            => $this->input->post('author', true),
            'published_at'      => $this->input->post('published_at', true),
            'status'            => $this->input->post('status', true),
        ];

        $this->News->update($id, $data);
        $this->session->set_flashdata('success', 'News berhasil diupdate.');
        redirect('news');
    }

    public function delete($id)
    {
        $news = $this->News->get_by_id($id);

        if (!$news) {
            show_404();
        }

        $this->News->delete($id);
        $this->session->set_flashdata('success', 'News berhasil dihapus.');
        redirect('news');
    }

    // Public news detail view
    public function public_detail($slug)
    {
        $data['title'] = 'Detail Berita';
        $data['news'] = $this->News->get_by_slug($slug);
        
        if (!$data['news']) {
            show_404();
        }

        // Get categories for sidebar with news counts
        $data['categories'] = $this->NewsCategory->get_all_with_news_count();
        
        // Get recent news for sidebar (exclude current news)
        $data['recent_news'] = $this->News->get_latest_published(5, $data['news']->id);

        $this->load->view('public/header', $data);
        $this->load->view('public/news_detail', $data);
        $this->load->view('public/footer', $data);
    }

    // Public news listing view
    public function public_index($slug = null)
    {

        if ($slug) {
            $data['title'] = 'Berita ' . ucfirst($slug);
        } else {
            $data['title'] = 'Semua Berita';
        }

        // Get filter parameters
        $filter_category_slug = $this->input->get('filter_category', true);
        $filter_keyword       = $this->input->get('filter_keyword', true);
        $page                 = (int) $this->input->get('page');

        if ($page < 1) {
            $page = 1;
        }

        // Convert slug to ID if category filter is provided
        $filter_category = null;
        if (!empty($filter_category_slug)) {
            $category = $this->NewsCategory->get_by_slug($filter_category_slug);
            if ($category) {
                $filter_category = $category->id;
            }
        }

        // Pagination configuration
        $per_page = 6;
        $offset   = ($page - 1) * $per_page;

        // Get categories for sidebar with news counts
        $data['categories'] = $this->NewsCategory->get_all_with_news_count();

        // Get total count for pagination
        $total_news = $this->News->get_filtered_count($filter_category, 'published', $filter_keyword);

        $data['total_rows'] = $total_news;
        $data['per_page']   = $per_page;
        $data['current_page'] = $page;

        // Get filtered news (published only) with pagination
        $data['news'] = $this->News->get_filtered($filter_category, 'published', $filter_keyword, $per_page, $offset);


        // Get recent news for sidebar
        $data['recent_news'] = $this->News->get_latest_published(5);

        // Initialize pagination
        $this->load->library('pagination');

        $config['base_url'] = base_url('news');
        $config['total_rows'] = $total_news;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers'] = true;
        $config['reuse_query_string'] = true;
        $config['num_links'] = 3;

        // Bootstrap 5 pagination
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Selanjutnya';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Sebelumnya';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('public/header', $data);
        $this->load->view('public/news_list', $data);
        $this->load->view('public/footer', $data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Model
{
    protected $table = 'news';

    public function get_all()
    {
        $this->db->select('news.*, news_categories.name as category_name, news_categories.slug as category_slug');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->order_by('news.published_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_filtered($category_id = null, $status = null, $keyword = null, $limit = null, $offset = null)
    {
        $this->db->select('news.*, news_categories.name as category_name');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');

        if (!empty($category_id)) {
            $this->db->where('news.category_id', $category_id);
        }

        if (!empty($status)) {
            $this->db->where('news.status', $status);
        }

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('news.title', $keyword);
            $this->db->or_like('news.author', $keyword);
            $this->db->group_end();
        }

        $this->db->order_by('news.published_at', 'DESC');
        
        if ($limit !== null) {
            $this->db->limit($limit);
        }
        
        if ($offset !== null) {
            $this->db->offset($offset);
        }
        
        return $this->db->get()->result();
    }

    public function get_filtered_count($category_id = null, $status = null, $keyword = null)
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');

        if (!empty($category_id)) {
            $this->db->where('news.category_id', $category_id);
        }

        if (!empty($status)) {
            $this->db->where('news.status', $status);
        }

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('news.title', $keyword);
            $this->db->or_like('news.author', $keyword);
            $this->db->group_end();
        }

        $result = $this->db->get()->row();
        return $result->count;
    }

    public function get_by_id($id)
    {
        $this->db->select('news.*, news_categories.name as category_name');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->where('news.id', $id);
        return $this->db->get()->row();
    }

    public function get_latest_published($limit = 6, $exclude_id = null)
    {
        $this->db->select('news.*, news_categories.name as category_name');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->where('news.status', 'published');
        
        if ($exclude_id !== null) {
            $this->db->where('news.id !=', $exclude_id);
        }
        
        $this->db->order_by('news.published_at', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function get_published($limit = null)
    {
        $this->db->select('news.*, news_categories.name as category_name, news_categories.slug as category_slug');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->where('news.status', 'published');
        $this->db->order_by('news.published_at', 'DESC');

        if ($limit !== null) {
            $this->db->limit($limit);
        }

        return $this->db->get()->result();
    }

    public function get_by_slug($slug)
    {
        $this->db->select('news.*, news_categories.name as category_name, news_categories.slug as category_slug');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->where('news.slug', $slug);
        $this->db->where('news.status', 'published');
        return $this->db->get()->row();
    }

    public function get_by_category_slug($category_slug)
    {
        $this->db->select('news.*, news_categories.name as category_name, news_categories.slug as category_slug');
        $this->db->from('news');
        $this->db->join('news_categories', 'news_categories.id = news.category_id', 'left');
        $this->db->where('news_categories.slug', $category_slug);
        $this->db->where('news.status', 'published');
        $this->db->order_by('news.published_at', 'DESC');
        return $this->db->get()->result();
    }
}
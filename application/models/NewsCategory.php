<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsCategory extends CI_Model
{
    protected $table = 'news_categories';

    public function get_all()
    {
        return $this->db->order_by('name', 'ASC')->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_all_with_news_count()
    {
        $this->db->select('news_categories.id, news_categories.name, news_categories.slug, COUNT(news.id) as news_count');
        $this->db->from('news_categories');
        $this->db->join('news', 'news.category_id = news_categories.id AND news.status = "published"', 'left');
        $this->db->group_by('news_categories.id, news_categories.name, news_categories.slug');
        $this->db->order_by('news_categories.name', 'ASC');
        return $this->db->get()->result();
    }

    public function get_by_slug($slug)
    {
        return $this->db->get_where($this->table, ['slug' => $slug])->row();
    }
}
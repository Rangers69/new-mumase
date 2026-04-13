<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get user by username for authentication
    public function get_by_username($username)
    {
        return $this->db->get_where('tb_user', ['nama_user' => $username])->row();
    }

    // Get user by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row();
    }

    // Get all users
    public function get_all()
    {
        $this->db->order_by('nama_user', 'ASC');
        return $this->db->get('tb_user')->result();
    }

    // Insert new user
    public function insert($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    // Update user
    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', $data);
    }

    // Delete user
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_user');
    }

    // Count total users
    public function count_all()
    {
        return $this->db->count_all('tb_user');
    }

    // Get active users only
    public function get_active()
    {
        return $this->db->get_where('tb_user', ['active' => 1])->result();
    }

    // Verify user credentials
    public function verify_user($username, $password)
    {
        $user = $this->get_by_username($username);
        
        if ($user && ($password == $user->password_user)) {
            return $user;
        }
        
        return false;
    }

    // Check if username exists
    public function username_exists($username)
    {
        $query = $this->db->get_where('tb_user', ['username' => $username]);
        return $query->num_rows() > 0;
    }

    // Check if email exists
    public function email_exists($email)
    {
        $query = $this->db->get_where('tb_user', ['email' => $email]);
        return $query->num_rows() > 0;
    }

    // Update last login
    public function update_last_login($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', ['last_login' => date('Y-m-d H:i:s')]);
    }

    // Change password
    public function change_password($id, $new_password)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
    }

    // Get users by role
    public function get_by_role($role)
    {
        $this->db->where('role', $role);
        $this->db->where('active', 1);
        $this->db->order_by('nama_user', 'ASC');
        return $this->db->get('tb_user')->result();
    }

    // Create user with hashed password
    public function create_user($data)
    {
        // Hash password before inserting
        if (isset($data['password'])) {
            $data['password_user'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        return $this->db->insert('tb_user', $data);
    }

    // Update user with password hashing
    public function update_user($id, $data)
    {
        // Hash password if provided
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password_user'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', $data);
    }
}

/*
CATATAN PENTING - PASSWORD HASHING:

Untuk keamanan, password harus disimpan dalam database dalam bentuk hash:
1. Gunakan metode create_user() atau update_user() untuk menyimpan user baru
2. Jangan simpan password dalam bentuk plain text
3. Database tb_user seharusnya memiliki struktur:
   - id_user (Primary Key, AUTO_INCREMENT)
   - username (VARCHAR, unique)
   - password (VARCHAR, panjang 255 untuk hash)
   - nama (VARCHAR)
   - email (VARCHAR)
   - role (VARCHAR: admin, user, dll)
   - active (TINYINT, default 1)
   - last_login (DATETIME, NULL)

Contoh query SQL untuk membuat admin user:
INSERT INTO tb_user (username, password, nama, email, role, active) 
VALUES ('admin', '$2y$10$abcdefghijklmnopqrstuvwx', 'Administrator', 'admin@example.com', 'admin', 1);

Password hash dihasilkan dari: password_hash('admin123', PASSWORD_DEFAULT);
*/

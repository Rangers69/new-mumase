<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Siswa');
    }

    // Halaman utama siswa - menampilkan daftar siswa
    public function index()
    {
        // Get filter parameters
        $filter_kelas = $this->input->get('filter_kelas');
        $filter_jurusan = $this->input->get('filter_jurusan');
        $search = $this->input->get('search');
        
        // Load students with filters
        $data['siswa'] = $this->Siswa->get_filtered($filter_kelas, $filter_jurusan, $search);
        
        // Load classes for filter dropdown
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas_list'] = $this->db->get('tb_kelas')->result();
        
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Siswa - SMK Muhammadiyah 15 Jakarta';

        $this->load->view('admin/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail siswa
    public function detail($id)
    {
        $data['siswa'] = $this->Siswa->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Siswa - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['siswa'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('siswa/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah siswa
    public function tambah()
    {
        $data['title'] = 'Tambah Siswa - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        // Load classes from tb_kelas
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas'] = $this->db->get('tb_kelas')->result();
        
        $this->load->view('admin/header', $data);
        $this->load->view('siswa/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman import siswa
    public function import()
    {
        $data['title'] = 'Import Data Siswa - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('siswa/import', $data);
        $this->load->view('admin/footer', $data);
    }

    // Download template CSV
    public function download_template()
    {
        // Set headers
        $headers = ['nama_siswa', 'nis', 'nisn', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'email', 'id_kelas', 'jurusan', 'tahun_masuk'];
        
        // Create CSV content
        $csv_content = implode(',', $headers) . "\n";
        
        // Add sample data
        $sample_data = [
            ['Ahmad Rizki', '12345', '0034567890', 'Jakarta', '2005-01-15', 'Laki-laki', 'Jl. Merdeka No. 123 Jakarta', '081234567890', 'ahmad@email.com', '1', 'Rekayasa Perangkat Lunak', '2023'],
            ['Siti Nurhaliza', '12346', '0034567891', 'Bandung', '2005-02-20', 'Perempuan', 'Jl. Sudirman No. 456 Bandung', '082345678901', 'siti@email.com', '2', 'Desain Komunikasi Visual', '2023']
        ];
        
        foreach ($sample_data as $row) {
            $csv_row = [];
            foreach ($row as $field) {
                // Escape quotes and commas in fields
                $escaped_field = str_replace('"', '""', $field);
                if (strpos($field, ',') !== false || strpos($field, '"') !== false || strpos($field, "\n") !== false) {
                    $csv_row[] = '"' . $escaped_field . '"';
                } else {
                    $csv_row[] = $escaped_field;
                }
            }
            $csv_content .= implode(',', $csv_row) . "\n";
        }
        
        // Send headers
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="template_import_siswa.csv"');
        header('Cache-Control: max-age=0');
        header('Pragma: public');
        header('Expires: 0');
        
        echo $csv_content;
        exit;
    }

    // Proses import CSV
    public function proses_import()
    {
        // Check if file was uploaded
        if (!isset($_FILES['excel_file']) || $_FILES['excel_file']['error'] != 0) {
            $this->session->set_flashdata('error', 'File tidak berhasil diupload. Silakan coba lagi.');
            redirect('siswacontroller/import');
        }
        
        $file = $_FILES['excel_file'];
        
        // Check file extension
        $allowed_extensions = ['csv'];
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        
        if (!in_array($file_ext, $allowed_extensions)) {
            $this->session->set_flashdata('error', 'Format file tidak diizinkan. Gunakan file .csv');
            redirect('siswacontroller/import');
        }
        
        // Check file size (max 5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            $this->session->set_flashdata('error', 'Ukuran file terlalu besar. Maksimal 5MB.');
            redirect('siswacontroller/import');
        }
        
        try {
            // Read CSV file
            $csv_data = [];
            $handle = fopen($file['tmp_name'], 'r');
            
            if ($handle === FALSE) {
                $this->session->set_flashdata('error', 'Tidak dapat membuka file CSV.');
                redirect('siswacontroller/import');
            }
            
            // Read headers
            $headers = fgetcsv($handle, 1000, ',');
            if ($headers === FALSE) {
                $this->session->set_flashdata('error', 'File CSV kosong atau tidak valid.');
                redirect('siswacontroller/import');
            }
            
            // Validate headers
            $expected_headers = ['nama_siswa', 'nis', 'nisn', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'email', 'id_kelas', 'jurusan', 'tahun_masuk'];
            $actual_headers = array_map('strtolower', $headers);
            
            if ($actual_headers !== $expected_headers) {
                $this->session->set_flashdata('error', 'Format header tidak sesuai. Silakan download template yang disediakan.');
                fclose($handle);
                redirect('siswacontroller/import');
            }
            
            $import_data = [];
            $errors = [];
            $row_num = 2; // Start from row 2 (after headers)
            
            // Read data rows
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if (count($data) < 12) {
                    $errors[] = "Baris {$row_num}: Jumlah kolom tidak lengkap. Harus 12 kolom.";
                    $row_num++;
                    continue;
                }
                
                // Skip empty rows
                if (empty(array_filter($data))) {
                    $row_num++;
                    continue;
                }
                
                // Validate required fields
                for ($col = 0; $col < 12; $col++) {
                    if (empty($data[$col])) {
                        $errors[] = "Baris {$row_num}: Kolom " . chr(65 + $col) . " tidak boleh kosong";
                    }
                }
                
                // Validate data types
                if (!empty($data[1]) && !is_numeric($data[1])) {
                    $errors[] = "Baris {$row_num}: NIS harus berupa angka";
                }
                
                if (!empty($data[2]) && !is_numeric($data[2])) {
                    $errors[] = "Baris {$row_num}: NISN harus berupa angka";
                }
                
                if (!empty($data[4])) {
                    $date = DateTime::createFromFormat('Y-m-d', $data[4]);
                    if (!$date) {
                        $errors[] = "Baris {$row_num}: Format tanggal lahir harus YYYY-MM-DD";
                    }
                }
                
                if (!empty($data[7]) && !is_numeric($data[7])) {
                    $errors[] = "Baris {$row_num}: No HP harus berupa angka";
                }
                
                if (!empty($data[9]) && !is_numeric($data[9])) {
                    $errors[] = "Baris {$row_num}: ID Kelas harus berupa angka";
                }
                
                if (!empty($data[11]) && !is_numeric($data[11])) {
                    $errors[] = "Baris {$row_num}: Tahun masuk harus berupa angka";
                }
                
                // Validate gender
                if (!empty($data[5]) && !in_array($data[5], ['Laki-laki', 'Perempuan'])) {
                    $errors[] = "Baris {$row_num}: Jenis kelamin harus 'Laki-laki' atau 'Perempuan'";
                }
                
                // Validate major
                if (!empty($data[10]) && !in_array($data[10], ['Rekayasa Perangkat Lunak', 'Desain Komunikasi Visual'])) {
                    $errors[] = "Baris {$row_num}: Jurusan harus 'Rekayasa Perangkat Lunak' atau 'Desain Komunikasi Visual'";
                }
                
                $import_data[] = $data;
                $row_num++;
            }
            
            fclose($handle);
            
            if (!empty($errors)) {
                $this->session->set_flashdata('error', 'Error validasi: ' . implode('<br>', array_slice($errors, 0, 10)));
                redirect('siswacontroller/import');
            }
            
            // Import data
            $success_count = 0;
            $import_errors = [];
            
            foreach ($import_data as $index => $data) {
                $row_num = $index + 2;
                
                // Check for duplicate NIS
                if ($this->Siswa->get_by_nis($data[1])) {
                    $import_errors[] = "Baris {$row_num}: NIS {$data[1]} sudah ada";
                    continue;
                }
                
                // Check for duplicate NISN
                $this->db->where('nisn', $data[2]);
                if ($this->db->count_all_results('tb_siswa') > 0) {
                    $import_errors[] = "Baris {$row_num}: NISN {$data[2]} sudah ada";
                    continue;
                }
                
                // Check for duplicate email
                $this->db->where('email', $data[8]);
                if ($this->db->count_all_results('tb_siswa') > 0) {
                    $import_errors[] = "Baris {$row_num}: Email {$data[8]} sudah ada";
                    continue;
                }
                
                // Prepare data for insertion
                $siswa_data = [
                    'nama_siswa' => $data[0],
                    'nis' => $data[1],
                    'nisn' => $data[2],
                    'tempat_lahir' => $data[3],
                    'tanggal_lahir' => $data[4],
                    'jenis_kelamin' => $data[5],
                    'alamat' => $data[6],
                    'no_hp' => $data[7],
                    'email' => $data[8],
                    'id_kelas' => $data[9],
                    'jurusan' => $data[10],
                    'tahun_masuk' => $data[11],
                    'active' => 1
                ];
                
                // Insert data
                $result = $this->Siswa->insert($siswa_data);
                
                if ($result) {
                    $success_count++;
                } else {
                    $import_errors[] = "Baris {$row_num}: Gagal menyimpan data";
                }
            }
            
            // Show result
            if ($success_count > 0) {
                $message = "Berhasil mengimport {$success_count} data siswa.";
                if (!empty($import_errors)) {
                    $message .= "<br>Error: " . implode('<br>', array_slice($import_errors, 0, 5));
                    if (count($import_errors) > 5) {
                        $message .= "<br>... dan " . (count($import_errors) - 5) . " error lainnya";
                    }
                }
                $this->session->set_flashdata('success', $message);
            } else {
                $this->session->set_flashdata('error', 'Tidak ada data yang berhasil diimport.<br>Error: ' . implode('<br>', array_slice($import_errors, 0, 5)));
            }
            
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Error processing file: ' . $e->getMessage());
        }
        
        redirect('siswacontroller/import');
    }

    // Proses tambah siswa
    public function proses_tambah()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|is_unique[tb_siswa.nis]');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|is_unique[tb_siswa.nisn]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_siswa.email]');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim|numeric|exact_length[4]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('siswacontroller/tambah');
        } else {
            $data = array(
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'nis' => $this->input->post('nis', true),
                'nisn' => $this->input->post('nisn', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'jurusan' => $this->input->post('jurusan', true),
                'tahun_masuk' => $this->input->post('tahun_masuk', true),
                'active' => 1
            );
            
            $result = $this->Siswa->insert($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data siswa berhasil ditambahkan');
                redirect('siswacontroller');
            } else {
                $this->session->set_flashdata('error', 'Data siswa gagal ditambahkan');
                redirect('siswacontroller/tambah');
            }
        }
    }

    // Halaman edit siswa
    public function edit($id)
    {
        $data['siswa'] = $this->Siswa->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Siswa - SMK Muhammadiyah 15 Jakarta';
        
        // Load classes from tb_kelas
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas'] = $this->db->get('tb_kelas')->result();
        
        if (empty($data['siswa'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('siswa/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses edit siswa
    public function proses_edit()
    {
        $this->load->library('form_validation');
        
        $id = $this->input->post('id_siswa');
        $current_siswa = $this->Siswa->get_by_id($id);
        
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|callback_check_nis[' . $id . ']');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|callback_check_nisn[' . $id . ']');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_check_email[' . $id . ']');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim|numeric|exact_length[4]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('siswacontroller/edit/' . $id);
        } else {
            $data = array(
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'nis' => $this->input->post('nis', true),
                'nisn' => $this->input->post('nisn', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'jurusan' => $this->input->post('jurusan', true),
                'tahun_masuk' => $this->input->post('tahun_masuk', true),
            );
            
            $result = $this->Siswa->update($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data siswa berhasil diperbarui');
                redirect('siswacontroller');
            } else {
                $this->session->set_flashdata('error', 'Data siswa gagal diperbarui');
                redirect('siswacontroller/edit/' . $id);
            }
        }
    }

    // Custom callback for unique NIS validation on edit
    public function check_nis($str, $id)
    {
        $siswa = $this->Siswa->get_by_nis($str);
        
        if ($siswa && $siswa->id_siswa != $id) {
            $this->form_validation->set_message('check_nis', 'The {field} field must contain a unique value.');
            return FALSE;
        }
        return TRUE;
    }

    // Custom callback for unique NISN validation on edit
    public function check_nisn($str, $id)
    {
        $this->db->where('nisn', $str);
        $this->db->where('id_siswa !=', $id);
        $siswa = $this->db->get('tb_siswa')->row();
        
        if ($siswa) {
            $this->form_validation->set_message('check_nisn', 'The {field} field must contain a unique value.');
            return FALSE;
        }
        return TRUE;
    }

    // Custom callback for unique email validation on edit
    public function check_email($str, $id)
    {
        $this->db->where('email', $str);
        $this->db->where('id_siswa !=', $id);
        $siswa = $this->db->get('tb_siswa')->row();
        
        if ($siswa) {
            $this->form_validation->set_message('check_email', 'The {field} field must contain a unique value.');
            return FALSE;
        }
        return TRUE;
    }

    // Halaman siswa tidak aktif
    public function inactive()
    {
        $data['siswa'] = $this->Siswa->get_inactive();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Siswa Tidak Aktif - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('siswa/inactive', $data);
        $this->load->view('admin/footer', $data);
    }

    // Nonaktifkan siswa
    public function set_inactive($id)
    {
        $result = $this->Siswa->deactivate($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data siswa berhasil dinonaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Data siswa gagal dinonaktifkan');
        }
        
        redirect('siswacontroller');
    }

    // Aktifkan kembali siswa
    public function activate($id)
    {
        $result = $this->Siswa->activate($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data siswa berhasil diaktifkan kembali');
        } else {
            $this->session->set_flashdata('error', 'Data siswa gagal diaktifkan kembali');
        }
        
        redirect('siswacontroller/inactive');
    }

    // Hapus siswa
    public function hapus($id)
    {
        $result = $this->Siswa->delete($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data siswa berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data siswa gagal dihapus');
        }
        
        redirect('siswacontroller');
    }
}

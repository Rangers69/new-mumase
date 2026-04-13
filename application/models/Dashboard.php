<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get dashboard statistics from tb_statistik
    public function get_dashboard_stats()
    {
        // Ambil jumlah siswa untuk tahun ajaran saat ini
        $query_current = "SELECT jumlah_siswa, jumlah_guru, jumlah_kelas FROM tb_statistik ORDER BY tahun_ajaran DESC LIMIT 1";
        $result_current = $this->db->query($query_current)->row();
        
        // Ambil jumlah untuk tahun ajaran sebelumnya
        $query_previous = "SELECT jumlah_siswa, jumlah_guru, jumlah_kelas FROM tb_statistik ORDER BY tahun_ajaran DESC LIMIT 1 OFFSET 1";
        $result_previous = $this->db->query($query_previous)->row();
        
        // Default values if no data found
        $current_students = $result_current ? $result_current->jumlah_siswa : 0;
        $previous_students = $result_previous ? $result_previous->jumlah_siswa : 0;
        
        $current_teachers = $result_current ? $result_current->jumlah_guru : 0;
        $previous_teachers = $result_previous ? $result_previous->jumlah_guru : 0;
        
        $current_classes = $result_current ? $result_current->jumlah_kelas : 0;
        $previous_classes = $result_previous ? $result_previous->jumlah_kelas : 0;
        
        // Hitung kenaikan dalam persentase untuk siswa
        $student_growth = $previous_students > 0 ? round(($current_students - $previous_students) / $previous_students * 100, 2) : 0;
        if ($student_growth > 0) {
            $student_keterangan = "Kenaikan";
        } elseif ($student_growth < 0) {
            $student_keterangan = "Penurunan";
        } else {
            $student_keterangan = "Tidak Ada Perubahan";
        }
        
        // Hitung kenaikan dalam persentase untuk guru
        $teacher_growth = $previous_teachers > 0 ? round(($current_teachers - $previous_teachers) / $previous_teachers * 100, 2) : 0;
        if ($teacher_growth > 0) {
            $teacher_keterangan = "Kenaikan";
        } elseif ($teacher_growth < 0) {
            $teacher_keterangan = "Penurunan";
        } else {
            $teacher_keterangan = "Tidak Ada Perubahan";
        }
        
        // Hitung kenaikan dalam persentase untuk kelas
        $class_growth = $previous_classes > 0 ? round(($current_classes - $previous_classes) / $previous_classes * 100, 2) : 0;
        if ($class_growth > 0) {
            $class_keterangan = "Kenaikan";
        } elseif ($class_growth < 0) {
            $class_keterangan = "Penurunan";
        } else {
            $class_keterangan = "Tidak Ada Perubahan";
        }
        
        return array(
            'students' => array(
                'total' => $current_students,
                'growth' => $student_growth,
                'keterangan' => $student_keterangan,
                'last_year' => $previous_students
            ),
            'teachers' => array(
                'total' => $current_teachers,
                'growth' => $teacher_growth,
                'keterangan' => $teacher_keterangan,
                'last_year' => $previous_teachers
            ),
            'classes' => array(
                'total' => $current_classes,
                'growth' => $class_growth,
                'keterangan' => $class_keterangan,
                'last_year' => $previous_classes
            )
        );
    }
}

-- Tabel Jadwal Pelajaran
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` INT(11) NOT NULL AUTO_INCREMENT,
  `id_guru_mapel` INT(11) NOT NULL,
  `id_kelas` INT(11) NOT NULL,
  `hari` VARCHAR(20) NOT NULL,
  `jam_mulai` TIME NOT NULL,
  `jam_selesai` TIME NOT NULL,
  `active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jadwal`),
  KEY `idx_guru_mapel` (`id_guru_mapel`),
  KEY `idx_kelas` (`id_kelas`),
  KEY `idx_hari` (`hari`),
  CONSTRAINT `fk_jadwal_guru_mapel` FOREIGN KEY (`id_guru_mapel`) REFERENCES `tb_guru_mapel` (`id_guru_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jadwal_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

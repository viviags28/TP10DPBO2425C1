CREATE DATABASE IF NOT EXISTS jadwal_idol;
USE jadwal_idol;

-- Tabel agensi
CREATE TABLE IF NOT EXISTS agensi (
  id INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(100) NOT NULL,
  alamat VARCHAR(150) NOT NULL,
  kontak VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel idol
CREATE TABLE IF NOT EXISTS idol (
  id INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(100) NOT NULL,
  umur INT NOT NULL,
  grup VARCHAR(100) NOT NULL,
  agensi_id INT NOT NULL,
  PRIMARY KEY (id),
  KEY fk_idol_agensi (agensi_id),
  CONSTRAINT fk_idol_agensi FOREIGN KEY (agensi_id) REFERENCES agensi(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel event
CREATE TABLE IF NOT EXISTS event (
  id INT NOT NULL AUTO_INCREMENT,
  nama_event VARCHAR(100) NOT NULL,
  lokasi VARCHAR(100) NOT NULL,
  tipe_event VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel jadwal
CREATE TABLE IF NOT EXISTS jadwal (
  id INT NOT NULL AUTO_INCREMENT,
  idol_id INT NOT NULL,
  event_id INT NOT NULL,
  tanggal DATE NOT NULL,
  jam TIME NOT NULL,
  PRIMARY KEY (id),
  KEY fk_jadwal_idol (idol_id),
  KEY fk_jadwal_event (event_id),
  CONSTRAINT fk_jadwal_idol FOREIGN KEY (idol_id) REFERENCES idol(id) ON DELETE CASCADE,
  CONSTRAINT fk_jadwal_event FOREIGN KEY (event_id) REFERENCES event(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data Agensi (6)
INSERT INTO agensi (nama, alamat, kontak) VALUES
('Star Harmony', 'Tokyo, Japan', '0800000001'),
('BlueMoon Entertainment', 'Seoul, Korea', '0800000002'),
('Gemilang Idol', 'Jakarta, Indonesia', '0812345678'),
('YG Entertainment', 'Seoul, Korea', '0800000003'),
('SM Entertainment', 'Seoul, Korea', '0800000004'),
('MAPPA', 'Tokyo, Japan', '0800000005');

-- Data Idol (6)
INSERT INTO idol (nama, umur, grup, agensi_id) VALUES
('Miyu', 20, 'Lunaria', 1),
('Sora', 19, 'Lunaria', 1),
('Aera', 22, 'Solaria', 2),
('Jin', 21, 'Solaria', 4),
('Dinda', 18, 'Cahaya', 3),
('Rafi', 23, 'Cahaya', 5);

-- Data Event (6)
INSERT INTO event (nama_event, lokasi, tipe_event) VALUES
('Winter Live Showcase', 'Osaka Dome', 'Konser'),
('Fan Signing Day', 'Seoul Hall', 'Fansign'),
('Indonesian Idol Gathering', 'Jakarta Convention Center', 'Meet & Greet'),
('Asian Games Opening Ceremony', 'Jakarta', 'Acara Resmi'),
('K-Pop Festival', 'Seoul Stadium', 'Konser'),
('Anime Expo Japan', 'Tokyo Big Sight', 'Festival');

-- Data Jadwal (6)
INSERT INTO jadwal (idol_id, event_id, tanggal, jam) VALUES
(1, 1, '2025-01-12', '18:00'),
(2, 2, '2025-01-14', '14:00'),
(3, 3, '2025-01-20', '10:00'),
(4, 4, '2025-01-22', '16:00'),
(5, 5, '2025-02-05', '12:00'),
(6, 6, '2025-02-10', '09:00');
CREATE DATABASE VoteX2526
CREATE TABLE pengguna (
    notel VARCHAR (15) NOT NULL,
    nama VARCHAR(150),
    katalaluan VARCHAR (30),
    jenis_pengguna VARCHAR (30),
    PRIMARY KEY (notel)
)

CREATE TABLE jawatan (
    kod_jawatan INT(1) AUTO_INCREMENT,
    nama_jawatan VARCHAR(60),
    PRIMARY KEY(kod_jawatan)
)

CREATE TABLE calon (
    id_calon INT (11) AUTO_INCREMENT,
    kod_jawatan INT (11),
    nama_calon VARCHAR (150), 
    gambar VARCHAR (60),
    PRIMARY KEY (id_calon),
    INDEX (kod_jawatan)
)

CREATE TABLE undian (
    notel VARCHAR (15),
    id_calon INT (11),
    PRIMARY KEY (notel,id_calon),
    INDEX(kod_jawatan)

    FOREIGN KEY(kod_jawatan),
    REFERENCES jawatan (kod_jawatan),
    ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE undian (
    notel VARCHAR (15), id calon INT (11)
    PRIMARY KEY (notel, id calon), 
    INDEX (idcalon),
    INDEX (notel),

    FOREIGN KEY (id calon) REFERENCES salen (id salon)
    ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (notel)
    REFERENCES pengguna (notel)
    ON UPDATE CASCADE ON DELETE CASCADE
)


INSERT INTO jawatan
(kod jawatan, nama jawatan) 
VALUES
(1, 'Pengerusi'),
(2, 'Naib Pengerusi'), 
(3, 'Setiausaha"),
(4, 'Bendahari')

INSERT INTO pengguna
(notel, nama, katalaluan, jenis pengguna)
VALUES
('740013', 'Arfan', '740013' 'admin' ),
('111', 'Abun', '111' 'pengundi)
('222', 'Alias', '222', 'pengundi')
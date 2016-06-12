DROP DATABASE IF EXISTS project;

CREATE DATABASE project;

USE project;

DROP TABLE IF EXISTS cinemas;

CREATE TABLE cinemas (
    cineID INT NOT NULL AUTO_INCREMENT,
    cineName VARCHAR (50),
    PRIMARY KEY (cineID));

CREATE TABLE films (
    filmID INT NOT NULL AUTO_INCREMENT,
    filmTitle VARCHAR (255),
    filmURL_image VARCHAR (255),
    filmDuration INT,
    PRIMARY KEY (filmID));

CREATE TABLE goTO (
    gtID INT NOT NULL AUTO_INCREMENT,
    cineID1 INT,
    cineID2 INT,
    how INT,
    gtDuration INT,
    PRIMARY KEY (gtID));
    
CREATE TABLE pass (
    passID INT NOT NULL AUTO_INCREMENT,
    cineID INT,
    filmID INT,
    passHour TIME,
    PRIMARY KEY (passID));

CREATE TABLE transport (
    transportID INT NOT NULL AUTO_INCREMENT,
    transport VARCHAR (50),
    PRIMARY KEY (transportID));
    
ALTER TABLE goTO
ADD CONSTRAINT fk_goTO_Transport
FOREIGN KEY (how)
REFERENCES transport(transportID);

ALTER TABLE goTO
ADD CONSTRAINT fk_goTO_cine1
FOREIGN KEY (cineID1)
REFERENCES cinemas(cineID);

ALTER TABLE goTO
ADD CONSTRAINT fk_goTO_cine2
FOREIGN KEY (cineID2)
REFERENCES cinemas(cineID);

ALTER TABLE pass
ADD CONSTRAINT fk_pass_cine
FOREIGN KEY (cineID)
REFERENCES cinemas(cineID);

ALTER TABLE pass
ADD CONSTRAINT fk_pass_fims
FOREIGN KEY (filmID)
REFERENCES films(filmID);

INSERT INTO project.cinemas (cineName) VALUES ('C.C. Thader');
INSERT INTO project.cinemas (cineName) VALUES ('C.C. Nueva Condomina');
INSERT INTO project.cinemas (cineName) VALUES ('C.C. El Tiro');
INSERT INTO project.cinemas (cineName) VALUES ('C.C. Centrofama');
INSERT INTO project.cinemas (cineName) VALUES ('Rex');

INSERT INTO project.films (filmTitle, filmURL_image, filmDuration) VALUES ('Capitán América: Civil War', 'http://pics.filmaffinity.com/Capit_n_Am_rica_Civil_War-298011137-large.jpg', 146);
INSERT INTO project.films (filmTitle, filmURL_image, filmDuration) VALUES ('Objetivo: Londres', 'http://www.labutaca.net/peliculas/wp-content/uploads/2014/11/london-has-fallen-cartel2.jpg', 99);

INSERT INTO project.transport (transport) VALUES ('SIN');
INSERT INTO project.transport (transport) VALUES ('Caminar');
INSERT INTO project.transport (transport) VALUES ('Coche');
INSERT INTO project.transport (transport) VALUES ('Autobus');

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 1, 1, 0);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 2, 1, 0);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 3, 1, 0);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 4, 1, 0);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 5, 1, 0);

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 2, 2, 20);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 2, 3, 4);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 2, 4, 17);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 3, 2, 39);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 3, 3, 5);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 3, 4, 50);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 4, 2, 70);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 4, 3, 15);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 4, 4, 29);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 5, 2, 75);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 5, 3, 20);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (1, 5, 4, 32);

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 1, 2, 20);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 1, 3, 4);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 1, 4, 17);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 3, 2, 55);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 3, 3, 8);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 3, 4, 62);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 4, 2, 28);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 4, 3, 17);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 4, 4, 28);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 5, 2, 94);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 5, 3, 24);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (2, 5, 4, 47);

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 1, 2, 39);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 1, 3, 5);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 1, 4, 50);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 2, 2, 55);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 2, 3, 8);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 2, 4, 62);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 4, 2, 61);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 4, 3, 15);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 4, 4, 21);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 5, 2, 69);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 5, 3, 21);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (3, 5, 4, 28);

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 1, 2, 70);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 1, 3, 15);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 1, 4, 29);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 2, 2, 28);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 2, 3, 17);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 2, 4, 28);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 3, 2, 61);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 3, 3, 15);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 3, 4, 21);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 5, 2, 11);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 5, 3, 8);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (4, 5, 4, 10);

INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 1, 2, 75);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 1, 3, 20);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 1, 4, 32);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 2, 2, 94);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 2, 3, 24);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 2, 4, 47);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 3, 2, 69);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 3, 3, 21);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 3, 4, 28);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 4, 2, 11);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 4, 3, 8);
INSERT INTO project.goTO (cineID1, cineID2, how, gtDuration) VALUES (5, 4, 4, 10);

INSERT INTO project.pass (cineID, filmID, passHour) VALUES (1, 1, '16:30');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (1, 1, '18:45');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (1, 2, '21:15');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (1, 2, '23:00');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (2, 1, '16:00');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (2, 1, '20:15');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (2, 2, '18:25');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (2, 2, '23:10');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (3, 1, '17:30');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (3, 1, '20:00');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (3, 2, '21:50');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (3, 2, '22:30');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (4, 1, '17:30');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (4, 1, '20:00');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (4, 2, '22:00');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (4, 2, '23:10');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (5, 1, '16:30');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (5, 1, '18:45');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (5, 2, '21:15');
INSERT INTO project.pass (cineID, filmID, passHour) VALUES (5, 2, '23:00');
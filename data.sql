create database vanilla;
use vanilla;

CREATE TABLE membre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    pwd VARCHAR(255) NOT NULL
);

INSERT INTO membre (nom, email, pwd) VALUES
('Dupont Jean', 'jean.dupont@example.com', 'yes'), -- password: password123
('Martin Sophie', 'sophie.martin@example.com', 'yes'), -- password: password123
('Lefèvre Paul', 'paul.lefevre@example.com', 'yes'),   -- password: password123
('Durand Alice', 'alice.durand@example.com', 'yes');    -- password: password123

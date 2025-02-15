CREATE TABLE articles (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          titre VARCHAR(255) NOT NULL,
                          contenu TEXT NOT NULL,
                          date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

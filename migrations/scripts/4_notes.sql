CREATE TABLE IF NOT EXISTS notes (
    id INT  UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    folder_id INT UNSIGNED NOT NULL,
    tittle VARCHAR(100) NOT NULL ,
    content TEXT,
    pinned BOOL DEFAULT FALSE,
    completed BOOL DEFAULT FALSE,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (folder_id) REFERENCES  folders(id)

);
CREATE TABLE IF NOT EXISTS shard_notes (

    id INT  UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    notes_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (notes_id) REFERENCES  notes(id)


);
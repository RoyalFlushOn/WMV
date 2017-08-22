CREATE TABLE(
	seating_id int(10),
	seat_id int(10),
	room varchar(5),
	rating chat,
	image_path varchar(30),
    PRIMARY KEY (seating_id)
    PRIMARY KEY (seat_id)
    FOREIGN KEY (seating_id)
        REFERENCES Seating_Plan(seating_id)
        ON DELETE SET NULL
)
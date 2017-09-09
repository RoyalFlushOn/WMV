CREATE TABLE Seating(
	seating_id int(10),
	seat_name varchar(4),
	rating char,
	image_path varchar(30),
	seating_plan_id int(10),
    PRIMARY KEY (seating_id),
	FOREIGN KEY (seating_plan_id)
		REFERENCES Seating_Plans(seating_plan_id)
		ON DELETE SET NULL
)
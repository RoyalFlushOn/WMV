CREATE TABLE Seating(
	seating_id int(10),
	seat_id int(10),
	room varchar(5),
	rating char,
	image_path varchar(30),
    PRIMARY KEY (seating_id, seat_id)
)
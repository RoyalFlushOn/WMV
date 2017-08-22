CREATE TABLE Seating_Profile(
    seating_prof_id int(10),
	multi_room char,
	style varchar(15),
	seating_plan_id int(10),
    Primary Key(seating_prof_id),
    Foreign key(seating_plan_id)
        References Seating_Plans(seating_plan_id)
        On Delete Set Null
)
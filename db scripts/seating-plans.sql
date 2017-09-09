CREATE TABLE Seating_Plans(
    seating_plan_id int(10),
    name varchar(15),
	seating_prof_id int(10),
    Primary key (seating_plan_id),
    Foreign key (seating_prof_id)
        References Seating_Profile(seating_prof_id)
        On Delete SET NULL
)
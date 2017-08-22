CREATE TABLE Seating_Plans(
    seating_plan_id int(10),
	seating_id int(10),
    Primary key (seating_plan_id)
    Foreign key (seating_id)
        References Seating(seating_id)
        On Delete SET NULL
)
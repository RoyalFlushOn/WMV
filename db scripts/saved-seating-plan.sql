CREATE TABLE Saved_Seating_Plans(
	saved_seating_plans int(10),
	seating_plan_id int(10),
    Primary Key(saved_seating_plans),
    Foreign Key(seating_plan_id)
        References Seating_plans(seating_plan_id)
        On Delete Set Null
)
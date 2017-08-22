CREATE TABLE Favourite_Seating_Plan(
    fav_seating_list_id int(10),
	seating_plan_id int(10),
	seating_id int(10),
	seat_id int(10),
    Primary Key(fav_seating_list_id)
    Primary Key(seating_plan_id)
    Primary Key(seating_id)
    Foreign Key (seating_plan_id)
        REFERENCES Seating_Plan(seating_plan_id)
        ON DELETE SET NULL
    Foreign Key (seating_id)
        REFERENCES Seating(seat_id)
        ON DELETE SET NULL
    Foreign Key (seating_id)
        REFERENCES Seating(seating_id)
        ON DELETE SET NULL    
)
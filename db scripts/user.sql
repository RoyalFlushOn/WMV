CREATE TABLE(
    user_id int(10),
    username varchar(15),
    first_name varchar(25),
    Last_name varchar(25),
    location_id int(10),
    saved_seating_plans int(10),
    fav_seating_list int(10),
    PRIMARY KEY (user_id)
    FOREIGN KEY (location_id)
        REFERENCES Location(location_id)
        ON DELETE SET NULL
    FOREIGN KEY (saved_seating_plans)
        REFERENCES Saved_Seating_Plans(saved_seating_plan)
        ON DELETE SET NULL
    FOREIGN KEY (fav_seating_list)
        REFERENCES Favorite_seating_list(fav_seating_list_id)
        ON DELETE SET NULL
)
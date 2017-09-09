CREATE TABLE Users(
    user_id int(10),
    username varchar(15),
    password varchar(150),
    first_name varchar(25),
    Last_name varchar(25),
    location_id int(10),
    fav_seating_list int(10),
    PRIMARY KEY (user_id),
    FOREIGN KEY (location_id)
        REFERENCES Location(local_id)
        ON DELETE SET NULL,
    FOREIGN KEY (fav_seating_list)
        REFERENCES Favourite_Seating_Plan(fav_seating_list_id)
        ON DELETE SET NULL
)
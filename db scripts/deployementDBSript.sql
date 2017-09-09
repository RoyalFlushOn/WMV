CREATE TABLE Location(
    local_id int(10),
    add_line_1 varchar(15),
    add_line_2 varchar(50),
    add_line_3 varchar(50),
    add_line_4 varchar(50),
    city_town varchar(20),
    postcode varchar(7),
    Primary Key(local_id)
);

CREATE TABLE Group_Location (
    group_local_id int(10),
	location int(10),
	no_venues int(4),
    Primary Key(group_local_id)
);

CREATE TABLE Seating_Profile(
    seating_prof_id int(10),
	multi_room char,
	style varchar(15),
    Primary Key(seating_prof_id)
);

CREATE TABLE Seating_Plans(
    seating_plan_id int(10),
    name varchar(15)
	seating_prof_id int(10),
    Primary key (seating_plan_id),
    Foreign key (seating_prof_id)
        References Seating_Profile(seating_prof_id)
        On Delete SET NULL
);

CREATE TABLE Seating(
	seating_id int(10),
	seat_name varchar(4),
	rating char,
	image_path varchar(30),
	seating_plan_id int(10),
    PRIMARY KEY (seating_id),
	FOREIGN KEY (seating_plan_id)
		REFERENCES Seating_Plan(seating_plan_id)
		ON DELETE SET NULL
);

CREATE TABLE Venue (
    venue_id int(10),
    name varchar(50),
    local_id int(10),
    group_local_id int(10),
    type varchar(15),
    capacity int(7),
    seating_prof_id int(10),
    rating varchar(1),
    Primary Key(venue_id),
    Foreign Key(local_id)
        References Location(local_id)
        On Delete Set Null,
    Foreign Key(group_local_id)
        References Group_Location(group_local_id)
        On Delete Set Null,
    Foreign Key(seating_prof_id)
        References Seating_Profile(seating_prof_id)
        On Delete Set Null
);

CREATE TABLE Favourite_Seating_Plan(
    fav_seating_list_id int(10),
	seating_plan_id int(10),
	seating_id int(10),
    Primary Key(fav_seating_list_id),
    Foreign Key (seating_plan_id)
        REFERENCES Seating_Plans(seating_plan_id)
        ON DELETE SET NULL,
    Foreign Key (seating_id, seat_id)
        REFERENCES Seating(seating_id)
        ON DELETE SET NULL   
);

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
);
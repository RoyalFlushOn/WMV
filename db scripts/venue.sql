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
)





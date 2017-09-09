INSERT INTO `Location` (`local_id`, `add_line_1`, `add_line_2`, `add_line_3`, `add_line_4`, `city_town`, `postcode`) VALUES
(20001, 'Address 1', 'Address 2', NULL, NULL, 'City 1', 'PSTCD1'),
(20002, 'Address 1', 'Address 2', NULL, NULL, 'Town 1', 'PSTCD2'), 
(20003, 'Address 1', 'Address 2', 'Address 3', NULL, 'City 2', 'PSTCD3'),
(20004, 'Address 1', 'Address 2', 'Address 3', NULL, 'Town 2', 'PSTCD4'),
(20005, 'Address 1', 'Address 2', 'Address 3', 'Address 4', 'City 3', 'PSTCD5');

INSERT INTO Group_Location (`group_local_id`, `location`,`no_venues`) VALUES
(60001, 'Location 1', 20),
(60002, 'Location 2', 25),
(60003, 'Location 3', 30),
(60004, 'Location 4', 35),
(60005, 'Location 5', 40);

INSERT INTO Seating_Profile (`seating_prof_id`, `multi_room`, `style`) VALUES
(30001, 'Y', 'Style1'),
(30002, 'N', 'Style2'),
(30003, 'Y', 'Style3'),
(30004, 'N', 'Style4'),
(30005, 'Y', 'Style3');

INSERT INTO Seating_Plans (`seating_plan_id`, `name`, `seating_prof_id`) VALUES
(40001, 'Screen 1', 30001),
(40002, 'Screen 2', 30001),
(40003, 'Screen 3', 30001),
(40004, 'Section 1', 30001),
(40005, 'Section 2', 30001);

INSERT INTO Seating (`seating_id`, `seat_name`, `rating`,`image_path`, `seating_plan_id`) VALUES
(50001, 'A1', '1', 'path/50001.png', 40001),
(50002, 'A2', '2', 'path/50002.png', 40001),
(50003, 'A3', '3', 'path/50003.png', 40001),
(50004, 'B1', '4', 'path/50004.png', 40003),
(50005, 'B2', '5', 'path/50005.png', 40003);


INSERT INTO `Venue` (`venue_id`, `name`, `local_id`, `group_local_id`, `type`, `capacity`, `seating_prof_id`, `rating`) VALUES 
(10001, 'Venue 1', 20001, 60001, 'Type 1', 25, 30001, 1),
(10002, 'Venue 2', 20002, 60002, 'Type 2', 30, 30002, 2),
(10003, 'Venue 3', 20003, 60003, 'Type 3', 40, 30003, 3),
(10004, 'Venue 4', 20004, 60004, 'Type 4', 50, 30004, 4),
(10005, 'Venue 5', 20005, 60005, 'Type 5', 60, 30005, 5);

INSERT INTO Favourite_Seating_List (`fav_seating_list_id`, `seating_plan_id`, `seating_id`) VALUES
(70001, 40001, 50001),
(70002, 40003, 50002),
(70003, 40005, NULL),
(70004, 40002, NULL),
(70005, 40004, 50005);

INSERT INTO USER (`user_id`, `username`, `first_name`, `last_name`, `location_id`, `fav_seating_list`) VALUES
(90001, 'userName1', 'pass1', 'first1', 'Last1', 20001, 70001),
(90002, 'userName2', 'pass1', 'first2', 'Last2', 20002, 70002),
(90003, 'userName3', 'pass3', 'first3', 'Last3', 20003, 70003),
(90004, 'userName4', 'pass4', 'first4', 'Last4', 20004, 70004),
(90005, 'userName5', 'pass5', 'first5', 'Last5', 20005, 70005);


 
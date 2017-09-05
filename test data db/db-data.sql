INSERT INTO `Location` (`local_id`, `add_line_1`, `add_line_2`, `add_line_3`, `add_line_4`, `city_town`, `postcode`) VALUES
(20001, 'Address 1', 'Address 2', NULL, NULL, 'City 1', 'PSTCD1'),(20002, 'Address 1', 'Address 2', NULL, NULL, 'Town 1', 'PSTCD2'), (20003, 'Address 1', 'Address 2', 'Address 3', NULL, 'City 2', 'PSTCD3'),(20004, 'Address 1', 'Address 2', 'Address 3', NULL, 'Town 2', 'PSTCD4'),(20005, 'Address 1', 'Address 2', 'Address 3', 'Address 4', 'City 3', 'PSTCD5');

INSERT INTO `Venue` (`venue_id`, `name`, `local_id`, `group_local_id`, `type`, `capacity`, `seating_prof_id`, `rating`) VALUES (10001, 'Venue 1', 20001, NULL, 'Type 1', 25, NULL, 1),(10002, 'Venue 2', 20002, NULL, 'Type 2', 30, NULL, 2),(10003, 'Venue 3', 20003, NULL, 'Type 3', 40, NULL, 3),(10004, 'Venue 4', 20004, NULL, 'Type 4', 50, NULL, 4),(10005, 'Venue 5', 20005, NULL, 'Type 5', 60, NULL, 5);


 
CREATE TABLE Finance_Tracker (
    id INT AUTO_INCREMENT PRIMARY KEY,
    salary1 DECIMAL(10, 2),
    salary2 DECIMAL(10, 2),
    rentalIncome DECIMAL(10, 2),
    foodDrink DECIMAL(10, 2),
    insurance DECIMAL(10, 2),
    entertainment DECIMAL(10, 2),
    travel DECIMAL(10, 2),
    utilities DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

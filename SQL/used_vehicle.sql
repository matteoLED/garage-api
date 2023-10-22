CREATE TABLE "used_vehicle" (
  "used_vehicle_id" int NOT NULL AUTO_INCREMENT,
  "brand" varchar(255) NOT NULL,
  "year_circulation" datetime NOT NULL,
  "mileage" int NOT NULL,
  "price" int NOT NULL,
  "description" varchar(1500) NOT NULL,
  "equipment" varchar(255) NOT NULL,
  "image_vehicle" varchar(500) NOT NULL,
  "vehicle_management" varchar(45) NOT NULL,
  PRIMARY KEY ("used_vehicle_id")
)
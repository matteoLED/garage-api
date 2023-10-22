CREATE TABLE "contact" (
  "contact_id" int NOT NULL AUTO_INCREMENT,
  "lastname" varchar(45) NOT NULL,
  "firstname" varchar(45) NOT NULL,
  "email" varchar(255) NOT NULL,
  "phone" varchar(15) DEFAULT NULL,
  "message" varchar(1000) NOT NULL,
  "senting_date" datetime NOT NULL,
  PRIMARY KEY ("contact_id")
)
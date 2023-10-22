CREATE TABLE "customer_testimonials" (
  "testimonial_id" int NOT NULL AUTO_INCREMENT,
  "client_name" varchar(255) NOT NULL,
  "comment" varchar(500) DEFAULT NULL,
  "rating" int DEFAULT NULL,
  "date_testimony" datetime NOT NULL,
  PRIMARY KEY ("testimonial_id")
)
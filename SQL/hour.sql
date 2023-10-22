CREATE TABLE "hours" (
  "hour_id" int NOT NULL AUTO_INCREMENT,
  "day" varchar(255) NOT NULL,
  "open_hour" datetime NOT NULL,
  "close_hour" datetime NOT NULL,
  PRIMARY KEY ("hour_id")
)
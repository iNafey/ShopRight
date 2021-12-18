USE `miniproject`;

insert into customer VALUES
(0,"JOHN", "LIKE","076943212","21057432223","2021-10-21")

;

Insert Into product values
(0,"Banana","Fruits","Dominican Republic",0.15,0.18,90,1000,"This is a banana"),
(0,"Semi Skimmed milk","Dairy","United Kingdom",1.2,2.2,50,1000,"This is milk"),
(0,"Oranges","Fruits","Italy",1.5,0.5,34,1000,"This is oranges"),
(0,"Avocados","Fruits","Mexico",1.2,0.15,198,1000,"This is avocados"),
(0,"Eggs","Dairy","United Kingdom",2,0.3,131,1000,"This is  eggs"),
(0,"Carrots","Vegetables","France",0.08,0.14,42,1000,"This is carrots"),
(0,"Broccoli","Vegetables","United Kingdom",0.7,0.4,38,1000,"This is Broccoli"),
(0,"Lemons","Vegetables","Chile",0.35,0.58,23,1000,"This is Lemons"),
(0,"Salmon Fillets","Seafood","Pacific Ocean",5,0.22,164,1000,"This is Salmon Fillets"),
(0,"Bleach","Household","United Kingdom",0.65,0.75, NULL,1000,"This is Bleach");



Insert into `order` values
	(0,1)
;

Insert into miniproject.`deliver address`  values
(1,"nixon court 33 putney rd",NULL,"Leicester","Leicestershire","LE2 7TG");

Insert into miniproject.productlist values
(1,1),
(1,2);
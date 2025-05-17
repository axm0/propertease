
create table User
(
    UserID    int auto_increment
        primary key,
    Name      varchar(255) not null,
    Password  varchar(255) not null,
    Email     varchar(255) not null,
    Phone_no  varchar(20)  null,
    User_type varchar(255) not null,
    constraint Email
        unique (Email),
    constraint Username
        unique (Name)
);



create table Property
(
    PropertyID      int auto_increment
        primary key,
    OwnerID         int                                 null,
    Address         varchar(255)                        not null,
    State           varchar(255)                        null,
    ZipCode         varchar(255)                        null,
    County          varchar(255)                        null,
    PropertyType    varchar(255)                        null,
    Size            decimal(10, 2)                      null,
    NumberBedrooms  smallint                            null,
    NumberBathrooms smallint                            null,
    ListingDate     date                                null,
    Description     varchar(255)                        null,
    Features        varchar(255)                        null,
    YearBuilt       smallint                            null,
    `Condition`     varchar(255)                        null,
    Price           int                                 null,
    ListingStatus   varchar(255) default 'Not for sale' null,
    constraint Property_ibfk_1
        foreign key (OwnerID) references User (UserID)
);

create index OwnerID
    on Property (OwnerID);



create table Transactions
(
    TransactionID   int auto_increment
        primary key,
    PropertyID      int                               not null,
    BuyerID         int                               not null,
    SellerID        int                               not null,
    TransactionDate date                              not null,
    Status          varchar(255) default 'Incomplete' null,
    SalePrice       double                            null,
    constraint Transactions_ibfk_1
        foreign key (PropertyID) references Property (PropertyID),
    constraint Transactions_ibfk_2
        foreign key (BuyerID) references User (UserID),
    constraint Transactions_ibfk_3
        foreign key (SellerID) references User (UserID)
);

create index BuyerID
    on Transactions (BuyerID);

create index PropertyID
    on Transactions (PropertyID);

create index SellerID
    on Transactions (SellerID);



create table Photos
(
    PhotoID     int auto_increment
        primary key,
    PropertyID  int                                    not null,
    PropertyURL varchar(255)                           null,
    Description varchar(255) default 'No description.' null,
    constraint Photos_ibfk_1
        foreign key (PropertyID) references Property (PropertyID)
            on delete cascade
);



create table Favorites
(
    LikeID     int auto_increment
        primary key,
    UserID     int not null,
    PropertyID int not null,
    constraint Favorites_ibfk_1
        foreign key (UserID) references User (UserID)
            on delete cascade,
    constraint Favorites_ibfk_2
        foreign key (PropertyID) references Property (PropertyID)
            on delete cascade
);

create index PropertyID
    on Favorites (PropertyID);

create index UserID
    on Favorites (UserID);



create table Finalizes
(
    ProcessingID  int auto_increment
        primary key,
    TransactionID int not null,
    UserID        int not null,
    constraint Finalizes_ibfk_1
        foreign key (TransactionID) references Transactions (TransactionID)
            on delete cascade,
    constraint Finalizes_ibfk_2
        foreign key (UserID) references User (UserID)
            on delete cascade
);

create index TransactionID
    on Finalizes (TransactionID);

create index UserID
    on Finalizes (UserID);



create table Involves
(
    PropertyID    int not null,
    TransactionID int not null,
    primary key (PropertyID, TransactionID),
    constraint Involves_ibfk_1
        foreign key (PropertyID) references Property (PropertyID)
            on delete cascade,
    constraint Involves_ibfk_2
        foreign key (TransactionID) references Transactions (TransactionID)
            on delete cascade
);

create index TransactionID
    on Involves (TransactionID);



create table Lists
(
    ListingID  int auto_increment
        primary key,
    PropertyID int not null,
    UserID     int not null,
    constraint Lists_ibfk_1
        foreign key (PropertyID) references Property (PropertyID)
            on delete cascade,
    constraint Lists_ibfk_2
        foreign key (UserID) references User (UserID)
            on delete cascade
);

create index PropertyID
    on Lists (PropertyID);

create index UserID
    on Lists (UserID);



create table Owns
(
    PropertyID int not null,
    UserID     int not null,
    constraint idx_owns_unique
        unique (PropertyID, UserID),
    constraint FK_Owns_PropertyID
        foreign key (PropertyID) references Property (PropertyID)
            on delete cascade,
    constraint FK_Owns_UserID
        foreign key (UserID) references User (UserID)
            on delete cascade
);



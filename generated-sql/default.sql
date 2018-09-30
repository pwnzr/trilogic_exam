
-----------------------------------------------------------------------
-- user
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [user];

CREATE TABLE [user]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [name] VARCHAR(128) NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- restaurants
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [restaurants];

CREATE TABLE [restaurants]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [name] VARCHAR(128) NOT NULL,
    [lat] FLOAT NOT NULL,
    [lng] FLOAT NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- addresses
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [addresses];

CREATE TABLE [addresses]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [address] VARCHAR(128) NOT NULL,
    [lat] FLOAT NOT NULL,
    [lng] FLOAT NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- orders
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [orders];

CREATE TABLE [orders]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [user_id] INTEGER NOT NULL,
    [address_id] INTEGER NOT NULL,
    [restaurant_id] INTEGER NOT NULL,
    [value] REAL NOT NULL,
    [date] DATETIME NOT NULL,
    [status] INTEGER NOT NULL,
    UNIQUE ([id]),
    FOREIGN KEY ([user_id]) REFERENCES [user] ([id]),
    FOREIGN KEY ([address_id]) REFERENCES [addresses] ([id]),
    FOREIGN KEY ([restaurant_id]) REFERENCES [restaurants] ([id])
);

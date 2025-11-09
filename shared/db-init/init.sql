:ON ERROR EXIT

PRINT 'Starting database initialization...'
PRINT 'Waiting for SQL Server to be ready...'
:SETVAR DBNAME "master"

-- Wait for SQL Server to be ready
WAITFOR DELAY '00:00:20'
GO

PRINT 'Creating auth_db...'
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'auth_db')
BEGIN
    CREATE DATABASE auth_db;
    PRINT 'auth_db created successfully'
END
ELSE
BEGIN
    PRINT 'auth_db already exists'
END
GO

PRINT 'Creating quiz_db...'
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'quiz_db')
BEGIN
    CREATE DATABASE quiz_db;
    PRINT 'quiz_db created successfully'
END
ELSE
BEGIN
    PRINT 'quiz_db already exists'
END
GO

PRINT 'Creating qbank_db...'
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'qbank_db')
BEGIN
    CREATE DATABASE qbank_db;
    PRINT 'qbank_db created successfully'
END
ELSE
BEGIN
    PRINT 'qbank_db already exists'
END
GO

PRINT 'Configuring databases...'

USE auth_db;
GO
ALTER DATABASE auth_db SET READ_COMMITTED_SNAPSHOT ON;
ALTER DATABASE auth_db SET RECOVERY SIMPLE;
PRINT 'auth_db configured'
GO

USE quiz_db;
GO
ALTER DATABASE quiz_db SET READ_COMMITTED_SNAPSHOT ON;
ALTER DATABASE quiz_db SET RECOVERY SIMPLE;
PRINT 'quiz_db configured'
GO

USE qbank_db;
GO
ALTER DATABASE qbank_db SET READ_COMMITTED_SNAPSHOT ON;
ALTER DATABASE qbank_db SET RECOVERY SIMPLE;
PRINT 'qbank_db configured'
GO

PRINT 'Database initialization completed successfully'
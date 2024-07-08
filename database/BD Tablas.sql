
CREATE TABLE Instituciones (
	Id_Institucion INT AUTO_INCREMENT,
	NombreInst VARCHAR(150),
	TipoInst VARCHAR(300),
	PRIMARY KEY (Id_Institucion)
);

CREATE TABLE Clientes (
	Id_Cliente INT AUTO_INCREMENT,
	NombreCli VARCHAR(100),
	ApellidoCli VARCHAR(100),
	celular VARCHAR(9),
	Dni VARCHAR(8),
	correo VARCHAR(100),
	PRIMARY KEY (Id_Cliente)
);

CREATE TABLE Asesores (
	Id_Asesor INT AUTO_INCREMENT,
	Nombre VARCHAR(150),
	Apellido VARCHAR(150),
	Dni VARCHAR(8),
	Email VARCHAR(100),
	celular VARCHAR(9),
	Direccion VARCHAR(500),
	Fecha_Nac DATE,
	CuentaBancaria VARCHAR(30),
	CuentaInterbancaria VARCHAR(30),
	Foto LONGTEXT,
	PRIMARY KEY (Id_Asesor)
);

CREATE TABLE Servicios (
	Id_Servicio INT AUTO_INCREMENT,
	NombreServ VARCHAR(100),
	PRIMARY KEY(Id_Servicio)
);

CREATE TABLE Tiempos_Estandar (
	Id_Estandar INT AUTO_INCREMENT,
	cant_horas FLOAT,
	PRIMARY KEY(Id_Estandar)
);


CREATE TABLE Notificaciones (
	Id_Notificacion INT AUTO_INCREMENT,
	Descripcion VARCHAR(100),
	canal VARCHAR(100),
	PRIMARY KEY(Id_Notificacion)
);

CREATE TABLE Documentos (
	Id_Documento INT AUTO_INCREMENT,
	Descripcion VARCHAR(500),
	archivo VARCHAR(300),
	PRIMARY KEY(Id_Documento)
);

CREATE TABLE Actividades (
	Id_Actividad INT AUTO_INCREMENT,
	descripcion VARCHAR(500),
	Id_Estandar INT,
	PRIMARY KEY(Id_Actividad),
	CONSTRAINT FK_Estandar FOREIGN KEY (Id_Estandar) REFERENCES Tiempos_Estandar(Id_Estandar)
);

CREATE TABLE Trabajos (
	Id_Trabajos INT AUTO_INCREMENT,
	Plan_serv VARCHAR(100),
	estado_pago VARCHAR(100),
	estado_trabajo VARCHAR(100),
	reporte VARCHAR(200),
	fechacontrato_ultima DATE,
	link_drave VARCHAR(500),
	observaciones VARCHAR(500),
	carrera VARCHAR(300),
	fecha_inicio DATE,
	fecha_fin DATE,
	Id_Cliente INT,
	Id_Asesor INT,
	Id_Institucion INT,
	Id_Servicio INT,
	PRIMARY KEY(Id_Trabajos),
	CONSTRAINT FK_Clientes FOREIGN KEY (Id_Cliente) REFERENCES Clientes(Id_Cliente),
	CONSTRAINT FK_Asesores FOREIGN KEY (Id_Asesor) REFERENCES Asesores(Id_Asesor),
	CONSTRAINT FK_Instituciones FOREIGN KEY (Id_Institucion) REFERENCES Instituciones(Id_Institucion),
	CONSTRAINT FK_Servicios FOREIGN KEY (Id_Servicio) REFERENCES Servicios(Id_Servicio)
);

CREATE TABLE Detalle_Actividades (
	Id_DetalleAct INT AUTO_INCREMENT,
	descripcion VARCHAR(500),
	fecha_inicio DATE,
	fecha_fin DATE,
	obs_jefe VARCHAR(300),
	just_asesor VARCHAR(300),
	Id_Trabajos INT,
	Id_Actividad INT,
	Id_Documento INT,
	Id_Notificacion INT,
	PRIMARY KEY(Id_DetalleAct),
	CONSTRAINT FK_Trabajos FOREIGN KEY (Id_Trabajos) REFERENCES Trabajos(Id_Trabajos),
	CONSTRAINT FK_Actividades FOREIGN KEY (Id_Actividad) REFERENCES Actividades(Id_Actividad),
	CONSTRAINT FK_Documentos FOREIGN KEY (Id_Documento) REFERENCES Documentos(Id_Documento),
	CONSTRAINT FK_Notificaciones FOREIGN KEY (Id_Notificacion) REFERENCES Notificaciones(Id_Notificacion)
);

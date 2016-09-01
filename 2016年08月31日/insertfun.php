
存储函数
create function insertfun(c_name varchar(20), c_address varchar(20), c_phone varchar(20)) returns void as
$$

begin

insert into college(name, address, phone ) values(c_name , c_address , c_phone) ;
end;
$$
language plpgsql;

执行函数
select insertfun ('ww123', 'werty123','12345123')

删除函数
drop FUNCTION insertfun(c_name varchar(20), c_address varchar(20), c_phone varchar(20))
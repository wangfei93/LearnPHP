CREATE FUNCTION max_data(data1 int, data2 int, data3 int) RETURNS int AS $$
BEGIN
if data1 > data2 then
if data3 > data1 then
return data3;
else
return data1;
end if;
else
if data3 > data2 then
return data3;
else
return data2;
end if;
end if;
END;
$$
LANGUAGE plpgsql;


select max_data (123, 1, 45)
-- Function --(SELECT * FROM goods WHERE goods_id=in_id);
delimiter $$
CREATE FUNCTION test(in_id INT UNSIGNED) RETURNS VARCHAR(255)
BEGIN
RETURN (SELECT CONCAT(goods_name,goods_num) FROM goods WHERE goods_id=in_id);
END$$
delimiter ;
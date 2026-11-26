-- Extra years added after the 2021 backup (runs after shankersinvitational.sql on a fresh database).
INSERT INTO `year` (`year`)
SELECT y FROM (SELECT 2022 y UNION SELECT 2023 UNION SELECT 2024 UNION SELECT 2025 UNION SELECT 2026) n
WHERE y NOT IN (SELECT `year` FROM `year`);

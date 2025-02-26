select id, staff_name, rank_name, division_name, increment_time, last_increment_date, leave_days,
date_add(date_add(last_increment_date, interval leave_days day), interval 2 year) coming_increment_date
from
(
select s.id, s.name staff_name, r.name rank_name, d.name division_name,
case when l.leave_days is null then 0 else l.leave_days end leave_days,
case
    when inc.increment_time is not null then inc.increment_time
    when s.current_increment_time > 0 and s.current_increment_time < 5 then s.current_increment_time
    else 0
end increment_time,
case
    when inc.increment_time is not null then inc.increment_date
    when s.current_increment_time > 0 and s.current_increment_time < 5 then s.last_increment_date
    else s.current_rank_date
end last_increment_date
from staff s
left join ranks r
on s.current_rank_id=r.id
left join divisions d
on s.current_division_id=d.id
left join

(
select *
from increments
where id in (
select max(i.id)
from increments i
where increment_time < 5
group by i.staff_id
)) inc
on s.id=inc.staff_id
left join
(
select staff_id, sum(qty) leave_days
from leaves where leave_type_id=5
group by staff_id
) l
on s.id=l.staff_id
) x


// Laravel query builder equivalent for the provided SQL query


DB::table(function ($query) {
    $query->select([
        's.id',
        's.name as staff_name',
        'r.name as rank_name',
        'd.name as division_name',
        DB::raw('CASE WHEN l.leave_days IS NULL THEN 0 ELSE l.leave_days END as leave_days'),
        DB::raw('CASE WHEN inc.increment_time IS NOT NULL THEN inc.increment_time
                  WHEN s.current_increment_time > 0 AND s.current_increment_time < 5 THEN s.current_increment_time ELSE 0 END as increment_time'),
        DB::raw('CASE WHEN inc.increment_time IS NOT NULL THEN inc.increment_date
                  WHEN s.current_increment_time > 0 AND s.current_increment_time < 5 THEN s.last_increment_date ELSE s.current_rank_date END as last_increment_date')
    ])
    ->from('staff as s')
    ->leftJoin('ranks as r', 's.current_rank_id', '=', 'r.id')
    ->leftJoin('divisions as d', 's.current_division_id', '=', 'd.id')
    ->leftJoin(DB::raw('(SELECT * FROM increments WHERE id IN (SELECT MAX(i.id) FROM increments i WHERE increment_time < 5 GROUP BY i.staff_id)) as inc'), 's.id', '=', 'inc.staff_id')
    ->leftJoin(DB::raw('(SELECT staff_id, SUM(qty) as leave_days FROM leaves WHERE leave_type_id = 5 GROUP BY staff_id) as l'), 's.id', '=', 'l.staff_id');
}, 'x')
->select([
    'x.id',
    'x.staff_name',
    'x.rank_name',
    'x.division_name',
    'x.increment_time',
    'x.last_increment_date',
    'x.leave_days',
    DB::raw('DATE_ADD(DATE_ADD(x.last_increment_date, INTERVAL x.leave_days DAY), INTERVAL 2 YEAR) as coming_increment_date')
])
->get();



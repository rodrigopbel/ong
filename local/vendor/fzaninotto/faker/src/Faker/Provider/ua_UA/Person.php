<?php

namespace Faker\Provider\ua_UA;

class Person extends \Faker\Provider\Person
{
    protected static $formats = array(
        '{{firstName}} {{middleName}} {{lastName}}',
        '{{lastName}} {{firstName}} {{middleName}}',
    );

    protected static $firstName = array(
        'Анатолій', 'Андрій', 'Антон', 'Аркадій', 'Арсеній', 'Богдан',
        'Болеслав', 'Борис', 'В\'ячеслав', 'Вадим', 'Валентин', 'Валерій', 'Василь',
        'Владислав', 'Володимир', 'Всеволод', 'Віктор', 'Віталий', 'Генадій', 'Георгій',
        'Григорій', 'Давид', 'Дан', 'Данил', 'Данило', 'Денис', 'Дмитро',
        'Захар', 'Илля', 'Йосиф', 'В\'Кирило', 'Костянтин', 'Лаврентій', 'Лев',
        'Леонід', 'Макар', 'Максим', 'Марк', 'Микита', 'Миколай', 'Мирослав',
        'Михайло', 'Назар', 'Олег', 'Олександр', 'Олексій', 'Петро', 'Платон',
        'Роман', 'Ростислав', 'Руслан', 'Сава', 'Савва', 'Святослав', 'Семен',
        'Сергій', 'Степан', 'Тарас', 'Тимофій', 'Федір', 'Фелікс', 'Юлій',
        'Юрій', 'Ян', 'Ярослав', 'Євген', 'Єгор', 'Єфим', 'Іван',
        'Ігор', 'Ілля'
    );

    protected static $middleName = array(
        'Олександрович', 'Олексійович', 'Андрійович', 'Євгенович', 'Сергійович', 'Іванович',
        'Федорович', 'Тарасович', 'Васильович', 'Романович', 'Петрович', 'Миколайович',
        'Борисович', 'Йосипович', 'Михайлович', 'Валентинович', 'Янович', 'Анатолійович',
        'Євгенійович', 'Володимирович'
    );

    protected static $lastName = array(
        'Антоненко', 'Василенко', 'Васильчук', 'Васильєв', 'Гнатюк', 'Дмитренко',
        'Захарчук', 'Іванченко', 'Микитюк', 'Павлюк', 'Панасюк', 'Петренко', 'Романченко',
        'Сергієнко', 'Середа', 'Таращук', 'Боднаренко', 'Броваренко', 'Броварчук', 'Кравченко',
        'Кравчук', 'Крамаренко', 'Крамарчук', 'Мельниченко', 'Мірошниченко', 'Шевченко', 'Шевчук',
        'Шинкаренко', 'Пономаренко', 'Пономарчук', 'Лысенко'
    );

    /**
     * Return middle name
     * @example 'Іванович'
     * @access public
     * @return string Middle name
     */
    public function middleName()
    {
        return static::randomElement(static::$middleName);
    }
}

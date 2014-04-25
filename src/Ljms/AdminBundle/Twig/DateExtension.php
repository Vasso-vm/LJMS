<?php
namespace Ljms\AdminBundle\Twig;

    class DateExtension extends \Twig_Extension
    {
        public function getFilters()
        {
            return array(
                new \Twig_SimpleFilter('age', array($this, 'ageFilter')),
            );
        }

        public function ageFilter($birth_date)
        {
            $year = $birth_date->format('Y');
            $tmp=$birth_date->format('md');
            $age=(date('Y'))-$year;
            if ($tmp>date('md')){
                $age=$age-1;
            }
            return $age;
        }

        public function getName()
        {
            return 'date_extension';
        }
    }
?>
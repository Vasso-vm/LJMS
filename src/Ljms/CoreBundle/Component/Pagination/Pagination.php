<?php
    namespace Ljms\CoreBundle\Component\Pagination;
    class Pagination
    {
        public function generate($paginator,$page)
        {
            $totalItems=count($paginator);
            $pagination['count_pages']=ceil($totalItems / $paginator->getQuery()->getMaxResults());
            $pagination['center']=ceil($pagination['count_pages']/2);
            if ($pagination['count_pages']>7){
                $pagination['end']=$page+3;
                $pagination['i']=$page-3;
                if ( $pagination['end']>$pagination['count_pages']){
                    $pagination['end']=$pagination['count_pages'];
                    $pagination['i']=$pagination['end']-6;
                }
                if ($pagination['i']<=0){
                    $pagination['i']=1;
                    switch ($page){
                        case 1:
                            $pagination['end']=$page+6;
                            break;
                        case 2:
                            $pagination['end']=$page+5;
                            break;
                        case 3:
                            $pagination['end']=$page+4;
                            break;
                    }
                }
            }
            else{
                $pagination['i']=1;
                $pagination['end']=$pagination['count_pages'];
            }
            return $pagination;
        }
    }
?>
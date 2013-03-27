<?php
App::uses('Helper', 'View');
/**
 * Description of SiteHelper
 *
 * @author Livio
 */
class SiteHelper extends AppHelper {
    public function menuActive($controller, $action = null) {
        if ($action === null) {
            if ($this->request->params['controller'] === $controller) {
                return 'class="active"';
            }
        }
        
        if ($this->request->params['controller'] === $controller
            && $this->request->params['action'] === $action) {
            
            return 'class="active"';
        }
    }
}

?>

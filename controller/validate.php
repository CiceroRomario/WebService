<?php
	//validação de mensagens na tela.
	function validate_message(){
		//caso haja mensagem a ser mostrada, mostre-as.
		if(isset($_GET['error'])){
			$alert_msg = $GLOBALS['dictionary'][$_GET['error']];
			$alert_icon = "warning-sign";
			$alert_class = "danger";
		}elseif(isset($_GET['success'])){
			$alert_msg = $GLOBALS['dictionary'][$_GET['success']];
			$alert_icon = "ok-circle";
			$alert_class = "success";
		}else{
			return false;
		}

		//renderizando alert
		require $GLOBALS['project_path'].'/templates/forms/alert.phtml';
	}

	//validar as opções de menu e perfil
	function validate_option(){
		//testa se existe pedido de option
		if(!isset($_GET['option'])){
			return false;
		}

		//globalizar o objeto usuário
		global $user;

		require $GLOBALS['project_path'].'/model/class/Connect.class.php';
		require $GLOBALS['project_path'].'/model/class/Manager.class.php';

		switch($_GET['option']){
			case "profile":
				//testa permissão
				if(!isset($user)){
					return false;
				}

				require $GLOBALS['project_path'].'/templates/profile.html';

				break;

			case "add_category":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				require $GLOBALS['project_path'].'/templates/forms/add_category.phtml';

				break;

			case "list_categories":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				$manager = new Manager();

				$table_content = $manager->select_common('tb_category', null, null, " ORDER BY category_name");

				//titulos da tabela
				$table_titles['id_category'] = "ID";
				$table_titles['category_name'] = "Nome";
				$table_titles['category_desc'] = "Descrição";
 
 				//Ações
				$update = true;
				$delete = true;
				
				//excluir
				$filter = "id_category";
				$delete_destiny = $GLOBALS['project_index'].'/controller/delete_category.php';
				$update_destiny = $GLOBALS['project_index']."/".$user->profile_page.'.php?option=update_category';

				require $GLOBALS['project_path'].'/templates/list_common.phtml';

				echo '<a href="?option=add_category">';
				echo '<span class="glyphicon glyphicon-plus"></span>';
				echo ' Nova Categoria</a><br>';

				break;

			case "add_user":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				$manager = new Manager();
				//tipos de conta
				$profiles = $manager->select_common('tb_profile', null, null, " ORDER BY profile_name");

				require $GLOBALS['project_path'].'/templates/forms/add_user.phtml';

				break;

			case "list_users":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				$manager = new Manager();

				$tables['tb_user'] = array();
				$tables['tb_profile'] = array('profile_name');
				$rel['tb_user.profile_id'] = "tb_profile.id_profile";

				$table_content = $manager->select_special($tables, $rel, null, " ORDER BY user_name");

				//titulos da tabela
				$table_titles['id_user'] = "ID";
				$table_titles['user_name'] = "Nome";
				$table_titles['profile_name'] = "Perfil";
 
				//Ações
				$delete = true;

				//excluir e editar
				$filter = "id_user";
				$delete_destiny = $GLOBALS['project_index'].'/controller/delete_user.php';
				
				require $GLOBALS['project_path'].'/templates/list_common.phtml';

				echo '<a href="?option=add_user">';
				echo '<span class="glyphicon glyphicon-plus"></span>';
				echo ' Novo Usuário</a><br>';

				break;

			case "list_products":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				$manager = new Manager();

				$tables['tb_product'] = array();
				$tables['tb_category'] = array('category_name');
				$rel['tb_product.category_id'] = "tb_category.id_category";

				$table_content = $manager->select_special($tables, $rel, null, "");

				$table_titles = array(
					'id_product' => "ID",
					'product_name' => "Nome",
					'category_name' => "Categoria",
					'product_details' => "Detalhes",
					'product_price' => "Preço",
					'product_quantity' => "Quantidade",
				);

				//Ações
				$update = true;
				$delete = true;

				//excluir
				$filter = "id_product";
				$delete_destiny = $GLOBALS['project_index'].'/controller/delete_product.php';
				$update_destiny = $GLOBALS['project_index']."/".$user->profile_page.'.php?option=update_product';


				require $GLOBALS['project_path'].'/templates/list_common.phtml';


				echo '<a href="?option=add_product">';
					echo '<span class="glyphicon glyphicon-plus">';
					echo '</span>';
					echo " Novo Produto";
				echo '</a>';
				break;

			case "add_product":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				//buscando categorias
				$manager = new Manager();

				$categories = $manager->select_common('tb_category', null, null, "");

				require $GLOBALS['project_path'].'/templates/forms/add_product.phtml';

				break;

			case "update_product":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				//teste se existe filtro
				if(!isset($_GET['filter'])){
					return false;
				}

				//buscando categorias
				$manager = new Manager();

				//buscando dados do produto
				$tables['tb_product'] = array();
				$tables['tb_category'] = array();
				$rel['tb_product.category_id'] = "tb_category.id_category";
				$filters['id_product'] = $_GET['filter'];
				$product = $manager->select_special($tables, $rel, $filters, " LIMIT 1");
				$product = $product[0];

				$categories = $manager->select_common('tb_category', null, null, "");

				require $GLOBALS['project_path'].'/view/forms/update_product.html';

				break;

			case "update_category":
				if(!isset($user) || $user->profile_page != "admin"){
					return false;
				}

				//teste se existe filtro
				if(!isset($_GET['filter'])){
					return false;
				}

				//buscando categorias
				$manager = new Manager();

				//buscando dados do produto
				
				$category = $manager->select_common('tb_category', null, array('id_category'=>$_GET['filter']), "");
				$category = $category[0];

				require $GLOBALS['project_path'].'/templates/forms/update_category.phtml';

				break;

			//caso não haja opções
			default:
				return false;
		}

		return true;
	}
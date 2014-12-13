<?php
if(!empty($_POST['type'])){
	require_once 'msg_func.php';	
	$user_file = 'user_function.php';
	require_once 'user_function.php';
	$message = new Message();
	$user = new User();
	$user->start_session();
	$user_id = $user->getUserBy('id');
	/*switch($_POST['type']){
		case 'add':
			addMessage();
			break;
		case 'get_ten':
			getMessages();
			break;
		case 'get_recent':
			$cond = ' and TIMESTAMPDIFF(second, message.date, now()) < 5';
			getMessages(false, $cond);
			break;
		case 'getMessage':
			$cond = (!empty($_POST['mid']))? ' and message.id = '.$_POST['mid']:'';
			getMessages(true, $cond);
			break;
		case 'getSent':
			getSentMessages(true);
			break;
		case 'sent':
			getSentMessages();
			break;
		default:
			echo 0;
			break;
	}*/
}
function addMessage(){
global $message, $user, $user_id;	
	if(!empty($_POST['message']) && !empty($_POST['subject']) && !empty($_POST['recipients'])){

		$subject = $_POST['subject'];
		$body = $_POST['message'];
		$recip = $_POST['recipients'];
		$recipient_id =$recip->getUserBy('id');
		if($message->addMessage($body,$subject,$user_id,$recipient_id)){
			echo ('MESSAGE SENT');
		}
		}

function getSentMessages($details = false){
	global $message, $user, $user_id;	
	$messages = $message->getSentMessages($user_id);
	if($messages){
		$push_message = array();
		foreach($messages as $message){ 
			if(true){
				echo"<tr  "((empty($message['id']) )? 'class="new"':'').' id="'.$message['id'].'"'  "onClick="readMessage(this, 'getSent')"">"";
					<td><?php echo $message['recipient_ids']; ?></td>
					<td><?php echo $message['subject'].'<span>  -   '.$message['body'].'</span>'; ?></td>
				</tr>
			<?php }else{
			?>
            <article id="mes_"<?php echo $message['id']; ?>>
            	<h3 class="dfrom"><span>From:</span><label><?php echo $message['user_id']; ?></label></h3>
            	<h3 class="dto"><span>To:</span><label><?php echo $message['recipient_ids']; ?></label></h3>
            	<h3 class="dsubject"><span>Subject:</span><label><?php echo $message['subject']; ?></label></h3>
                <p class="dmessage"><?php echo $message['body']; ?></p>
            </article>
            	}
		}
	}else{
		echo 0;
	}		
}

function getMessages($details = false, $condition = ''){
	global $message, $user, $user_id;	
	$messages = $message->getMessages($user_id, 10, $condition);
	if($messages){
		$push_message = array();
		foreach($messages as $message){ 
			if(!$details){
				array_push($push_message, $message['message_id']);
			       
				<tr <?php echo ((empty($message['message_id']) )? 'class="new"':'').' id="'.$message['mid'].'"'; ?> onClick="readMessage(this, 'getMessage')">
					<td><?php echo $message['user_id']; ?></td>
					<td><?php echo $message['subject'].'<span>  -   '.$message['body'].'</span>'; ?></td>
				</tr>
			<?php }else{
				$message->messageRead($message['mid'], $user_id);
			?>
            <article id="mes_<?php echo $message['mid']; ?>">
            	<input type="button" value="close" class="close" onClick="closeMessage()" />
            	<h2 class="dsubject"><span>Subject:</span><label><?php echo $message['subject']; ?></label></h2>
            	<input type="button" value="reply" class="reply" onClick="reply('mes_<?php echo $message['mid']; ?>')" />
            	<h3 class="dfrom"><span>From:</span><label><?php echo $message['user_id']; ?></label></h3>
            	<h3 class="dto"><span>To:</span><label><?php echo $message['recipient_ids']; ?></label></h3>
                <h3 class="ddate"><span>Date</span><label><?php echo $message['arrive_date']; ?></label></h3>
                <p class="dmessage"><?php echo $message['body']; ?></p>
            </article>
            <?php	
            break;
            }
		}
	}else{
		echo 0;
	}		
}?>

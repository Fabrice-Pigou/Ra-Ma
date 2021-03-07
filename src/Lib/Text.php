<?php 
namespace App\Lib;

class Text
{
	/**
	 * Convertie un tableau en objet
	 * @param array $data
	 * @return object
	 */
	public function ToObjet($data)
	{
		$data = json_encode($data);
		$data = json_decode($data);
		return $data;
	}

	//	Convertie un objet en tableau
	public function ToArray($data)
	{
		$data = json_encode($data);
		$data = json_decode($data, true);
		return $data;
	}

	/**
	 * Récupère l'extrait d'un texte
	 * @param string $content
	 * @param int $limit
	 * @return string
	 */
	public static function excerpt(string $content, int $limit = 60):string
	{
		if (mb_strlen($content) <= $limit) {
			return $content;
		}
		$lastSpace = mb_strpos($content, ' ', $limit);
		return mb_substr($content, 0, $lastSpace) .' ...';
	}

	/**
	 * Convertie une chaine de caractère pour affichage dans la chaîne de requète(URL)
	 * @param string $sString
	 * @return string
	 */
	public function slug(string $content):string {
		$content = preg_replace('#-#', ' ', $content);
		$content = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $content);
		$content = preg_replace('# #', '-', $content);
		$content = preg_replace('#---#', '-', $content);
		$content = preg_replace('#--#', '-', $content);
		$content = preg_replace('#œ#', 'oe', $content);
		$content = trim($content,'-');
		return $content;
	}

	public function bbcode($text)
	{
		$text = htmlspecialchars($text);
		$text = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $text);
		$text = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $text);
		$text = preg_replace('#\[del\](.+)\[/del\]#isU', '<del>$1</del>', $text);
		$text = preg_replace('#\[a href=(.+)\](.+)\[/a\]#isU', '<a class="nav-link p-0 d-inline" href=$1>$2</a>', $text);
		$text = preg_replace('#\[img src=(.+) alt=(.+)\]#isU', '<img class="img-fluid rounded d-block mr-auto ml-auto mt-3" src="$1" alt="$2"/>', $text);

		$text = preg_replace('#\[h1\](.+)\[/h1\]#isU', '<span class="bbcode-h1">$1</span>', $text);
		$text = preg_replace('#\[h2\](.+)\[/h2\]#isU', '<span class="bbcode-h2">$1</span>', $text);
		$text = preg_replace('#\[h3\](.+)\[/h3\]#isU', '<span class="bbcode-h3">$1</span>', $text);
		$text = preg_replace('#\[h4\](.+)\[/h4\]#isU', '<span class="bbcode-h4">$1</span>', $text);
		$text = preg_replace('#\[h5\](.+)\[/h5\]#isU', '<span class="bbcode-h5">$1</span>', $text);
		$text = preg_replace('#\[h6\](.+)\[/h6\]#isU', '<span class="bbcode-h6">$1</span>', $text);

		$text = preg_replace('#\[ul\](.+)\[/ul\]#isU', '<ul>$1</ul>', $text);
		$text = preg_replace('#\[ol\](.+)\[/ol\]#isU', '<ol>$1</ol>', $text);
		$text = preg_replace('#\[li\](.+)\[/li\]#isU', '<li>$1</li>', $text);
		$text = preg_replace('#\[p\](.+)\[/p\]#isU', '<p>$1</p>', $text);
		return $text;
	}
}
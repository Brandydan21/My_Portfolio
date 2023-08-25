using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameOverScript : MonoBehaviour 
{
	public Text scoreText;


	void Awake()
	{
		Cursor.lockState = CursorLockMode.Confined;
		Cursor.visible = true; // make the cursor useable again.
		scoreText.text = "Score - " + PlayerPrefs.GetInt("score").ToString();
	}


	public void LoadScene(string levelName)
	{
		if (levelName == null)
			Debug.Log("<color=orange>"+gameObject.name+": No Scene Name Was given for the StartAgain function!</color>");
		SceneManager.LoadScene(levelName);
	}
}

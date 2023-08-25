using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class StyleBar : MonoBehaviour
{
    public Image styleBar;
    public float maxStyle;
    private float curStyle;
    public EnemyScriptCopy EnemyScriptImpactEffect;

    void Update()
    {
        curStyle = EnemyScriptImpactEffect.Style;
        styleBar.fillAmount = curStyle / maxStyle;
    }
}

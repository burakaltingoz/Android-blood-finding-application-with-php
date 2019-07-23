package com.example.isatan.burbo;


import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;


import org.json.JSONObject;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import static com.example.isatan.burbo.R.id.Spinner02;


public class CagriActivity extends AppCompatActivity implements View.OnClickListener {
    private String array_spinner[];
    public static final String REGISTER_URL = "http://burakaltingoz.xyz/cagri.php";

    public static final String KEY_ADSOY = "adSoy";
    public static final String KEY_KANG = "kanG";
    public static final String KEY_SEHIR = "sehir";
    public static final String KEY_TELNO= "telNo";


    private EditText editTextAdSoy;
    //private EditText editTextKanG;
    private EditText editTextSehir;
    private EditText editTextTelNo;
    private Button buttonregister;

    String ad="";

    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(com.example.isatan.burbo.R.layout.activity_cagri);
        editTextAdSoy = (EditText) findViewById(R.id.adSoy);
        editTextSehir = (EditText) findViewById(R.id.sehir);
        editTextTelNo = (EditText) findViewById(R.id.telNo);
        buttonregister = (Button) findViewById(R.id.kanAra);

        array_spinner=new String[9];
        array_spinner[0]="Kan Grubu Seçiniz";
        array_spinner[1]="Arh-";
        array_spinner[2]="Arh+";
        array_spinner[3]="Brh-";
        array_spinner[4]="Brh+";
        array_spinner[5]="0rh-";
        array_spinner[6]="0rh+";
        array_spinner[7]="ABrh-";
        array_spinner[8]="ABrh+";
        Spinner s = (Spinner) findViewById(Spinner02);
        ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, array_spinner);
        s.setAdapter(adapter);
        buttonregister.setOnClickListener(this);
        }

    private void registerKan(){

        final String adSoy = editTextAdSoy.getText().toString().trim();
        final String sehir = editTextSehir.getText().toString().trim();
        final String telNo = editTextTelNo.getText().toString().trim();

        Spinner spinner = (Spinner) findViewById(R.id.Spinner02);
        final String kanG = spinner.getSelectedItem().toString().trim();
        ad=adSoy;

        if (adSoy==null||adSoy.isEmpty()||sehir==null||sehir.isEmpty()||telNo==null||telNo.isEmpty()||kanG==null||kanG.isEmpty()||kanG=="Kan Grubu Seçiniz")
        {
            Toast.makeText(CagriActivity.this,"Lütfen Tüm Alanları Doldurunuz!",Toast.LENGTH_LONG).show();
        }
        else {
            StringRequest stringRequest = new StringRequest(Request.Method.POST, REGISTER_URL,
                    new Response.Listener<String>(){
                @Override
                        public void onResponse(String response){
                            try{
                                JSONObject object= new JSONObject(response);
                                Iterator<String> iter = object.keys();
                                while (iter.hasNext()) {
                                    String key = iter.next();

                                    if(key.equals("olumlu"))
                                    {

                                        String olumlu=object.getString("olumlu");
                                        Toast.makeText(CagriActivity.this,olumlu,Toast.LENGTH_LONG).show();
                                        finish();

                                    }
                                    else if(key.equals("olumsuz"))
                                    {
                                        String olumsuz=object.getString("olumsuz");
                                        Toast.makeText(CagriActivity.this,olumsuz,Toast.LENGTH_LONG).show();
                                    }
                                }
                            } catch (Throwable t) {
                                Log.e("My App", "Could not parse malformed JSON: \"" + response + "\"");
                                Intent intent = new Intent(CagriActivity.this, com.example.isatan.burbo.ListActivity.class);
                                startActivity(intent);
                            }
                            }

                },

                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(CagriActivity.this, error.toString(), Toast.LENGTH_LONG).show();
                        }
                    }) {
                @Override
                protected Map<String, String> getParams() {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put(KEY_ADSOY, adSoy);
                    params.put(KEY_KANG, kanG);
                    params.put(KEY_SEHIR, sehir);
                    params.put(KEY_TELNO, telNo);
                    return params;
                }

            };

            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(stringRequest);
                    }
        }

    @Override
    public void onClick (View v){
        if(v == buttonregister){
            registerKan();
        }}
}

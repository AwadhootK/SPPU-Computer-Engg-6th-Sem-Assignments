import streamlit as st

knowledge_base = {
    "cold": [
        "1: Tylenol",
        "2: Panadol",
        "3: Nasal spray",
        "4: Please wear warm clothes!"
    ],

    "influenza": [
        "1: Tamiflu",
        "2: Panadol",
        "2: Zanamivir",
        "4: Please take a warm bath and do salt gargling!"
    ],

    "typhoid": [
        "1: Chloramphenicol",
        "2: Amoxicillin",
        "3: Ciproflaxacin",
        "4: Azithromycin",
        "5: Please do complete bed rest and take soft diet!"
    ],

    "chicken pox": [
        "1: Varicella vaccine",
        "2: Immunoglobulin",
        "3: Acetomenaphin",
        "4: Acyclovir",
        "5: Please do have have oatmeal and stay at home!"
    ],

    "measles": [
        "1: Tylenol",
        "2: Aleve",
        "3: Advil",
        "4: Vitamin A",
        "5: Please get rest and use more liquid!"
    ],

    "malaria": [
        "1: Aralen",
        "2: Qualaquin",
        "3: Plaquenil",
        "4: Mefloquine",
        "5: Please do not sleep in open air and cover your full skin!"
    ]
}

disease_symptoms = {
    frozenset(['rash', 'body ache', 'fever']): "Chicken Pox",
    frozenset(['headache', 'runny nose', 'sneezing', 'sore throat']): "Cold",
    frozenset(['headache', 'abdominal pain', 'poor appetite', 'fever']): "Typhoid",
    frozenset(['fever', 'runny nose', 'rash', 'conjunctivitis']): "Measles",
    frozenset(['sore throat', 'fever', 'headache', 'chills', 'body ache']): "Influenza",
    frozenset(['fever', 'sweating', 'headache', 'nausea', 'vomiting', 'diahrrea']): "Malaria"
}

symptom_choices = ["headache", "runny nose", "sneezing", "sore throat", "fever", "chills", "body ache", "abdominal pain",
                   "poor appetite", "rash", "conjunctivitis", "sweating", "nausea", "vomiting", "diahrrea"]

st.title("Medical Diagnosis Expert System")


def respond(input):
    symptoms = input
    if frozenset(symptoms) in disease_symptoms:
        disease = disease_symptoms[frozenset(symptoms)]
        st.write(f"You have {disease}")
        st.write("Please take the following medicines and precautions-")
        for i in knowledge_base[disease.lower()]:
            st.write(i)
        return True
    else:
        return False


if __name__ == "__main__":
    options = st.multiselect(
        'What are your symptoms?',
        symptom_choices,
        [])

    ask = st.button("Ask")
    if ask:
        if not respond(options):
            st.write(
                "Disease is not present in the knowledge base! Please enter the name of the disease:")
            # disease_name = st.text_input("Disease Name")
            # add_btn = st.button('Add disease')
            # if disease_name:
            #     print("disease = ", disease_name)
            #     disease_symptoms[frozenset(options)] = disease_name
            #     st.write(f"Added {disease_name} to the knowledge base.")
            # elif not disease_name:
            #     st.write("Please enter a disease name before adding.")

def conv_Singular_to_Plural(singular)
		
		special_Words = ["tax"]
		
		if special_Words.include?(singular)
				
				return singular + "s"
				
		else
			
			if singular == special_Words[0]		# tax
					
					return "taxes"
					
			else
					
					return singular + "s"
					
			end
			
		end#if special_Words.include?(singular)
		
end#conv_Singular_to_Plural
